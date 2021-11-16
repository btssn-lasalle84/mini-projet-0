#include <Arduino.h>
#include <Wire.h>
#include <SoftwareSerial.h>
//#include <string.h>

#include "pinout.h"

#define DEBUG_SERIAL
//#define DEBUG

#define DEBIT_SERIE       9600
#define DELIMITEUR_DEBUT  '$'
#define DELIMITEUR_FIN    '\n'
#define FIN               0x00 // fin de chaîne

void detecteEntree1();
void detecteEntree2();
void lireEntreesEnalogiques();
void commanderBuzzer(int tonalite);
void commanderLedRouge(bool etat);
void commanderLedBleue(bool etat);
void commanderLedRGBRouge(bool etat);
void commanderLedRGBVerte(bool etat);
void commanderLedRGBBleue(bool etat);
void eteindreLeds();
void testerBuzzer();
void testerLeds();
void lireTrame();
void envoyerTrame();

SoftwareSerial serie(RX, TX);

void setup()
{
  Serial.begin(9600);
  #ifdef DEBUG
  Serial.println(F("Simulateur + Shield 321MAKER"));
  #endif

  // Les entrées
  pinMode(SW1, INPUT);
  pinMode(SW2, INPUT);
  attachInterrupt(digitalPinToInterrupt(SW1), detecteEntree1, FALLING);
  attachInterrupt(digitalPinToInterrupt(SW2), detecteEntree2, FALLING);

  // Les sorties
  pinMode(BUZZER, OUTPUT);
  pinMode(RGB_ROUGE, OUTPUT);
  pinMode(RGB_VERTE, OUTPUT);
  pinMode(RGB_BLEUE, OUTPUT);
  pinMode(LED_ROUGE, OUTPUT);
  pinMode(LED_BLEUE, OUTPUT);

  serie.begin(DEBIT_SERIE);

  eteindreLeds();

  #ifdef SIMULATION
  randomSeed(millis());
  #endif
}

void loop()
{
  testerBuzzer();
  testerLeds();
  while(1)
  {
    if(serie.available())
      lireTrame();
    lireEntreesEnalogiques();
    envoyerTrame();
    delay(1000);
  }
}

void detecteEntree1()
{
  commanderBuzzer(147);
  commanderLedRouge(true);
  delay(200);
  commanderLedRouge(false);
  commanderBuzzer(1047);
}

void detecteEntree2()
{
  commanderBuzzer(176);
  commanderLedBleue(true);
  delay(200);
  commanderLedBleue(false);
  commanderBuzzer(1760);
}

void lireEntreesEnalogiques()
{
  uint16_t VRotation = analogRead(Rotation);
  uint16_t VLight = analogRead(Light);
  uint16_t VLM35 = analogRead(LM35);

  #ifdef DEBUG
  Serial.print("VRotation 0x");
  Serial.print(VRotation, HEX);
  Serial.print(" -> ");
  Serial.print(VRotation);
  Serial.print(" -> ");
  Serial.print(float(VRotation) * (3.3 / 1023.0));
  Serial.println(" V");
  Serial.print("VLight 0x");
  Serial.print(VLight, HEX);
  Serial.print(" -> ");
  Serial.print(VLight);
  Serial.print(" -> ");
  Serial.print(float(VLight) * (3.3 / 1023.0));
  Serial.println(" V");
  Serial.print("VLM35 0x");
  Serial.print(VLM35, HEX);
  Serial.print(" -> ");
  Serial.print(VLM35);
  Serial.print(" -> ");
  Serial.print(float(VLM35) * (3.3 / 1023.0));
  Serial.println(" V");
  #endif

  uint8_t pourcentage = uint8_t((float(VRotation) * (3.3 / 1023.0)) * (100. / 3.3));
  float temperature = float(VLM35) * (3.3 / 1023.0 * 100.0); // 10mV = 1°C

  #ifdef DEBUG
  Serial.print("Rotation : ");
  Serial.print(pourcentage);
  Serial.print(" % - Light : ");
  Serial.print(VLight-300);
  Serial.print(" - LM35 : ");
  Serial.print(temperature, 1);
  Serial.println(" C\n");
  #endif
}

void commanderBuzzer(int tonalite)
{
    tone(BUZZER, tonalite, 200);
}

void commanderLedRouge(bool etat)
{
    digitalWrite(LED_ROUGE, etat ? HIGH : LOW);
}

void commanderLedBleue(bool etat)
{
    digitalWrite(LED_BLEUE, etat ? HIGH : LOW);
}

void commanderLedRGBRouge(bool etat)
{
    digitalWrite(RGB_ROUGE, etat ? HIGH : LOW);
}

void commanderLedRGBVerte(bool etat)
{
    digitalWrite(RGB_VERTE, etat ? HIGH : LOW);
}

void commanderLedRGBBleue(bool etat)
{
    digitalWrite(RGB_BLEUE, etat ? HIGH : LOW);
}

void eteindreLeds()
{
  commanderLedRouge(false);
  commanderLedBleue(false);
  commanderLedRGBRouge(false);
  commanderLedRGBVerte(false);
  commanderLedRGBBleue(false);
}

void testerBuzzer()
{
  tone(BUZZER, 523, 200);
  delay(200);
  tone(BUZZER, 131, 200);
}

void testerLeds()
{
  commanderLedRouge(true);
  delay(500);
  commanderLedRouge(false);
  commanderLedBleue(true);
  delay(500);
  commanderLedBleue(false);

  commanderLedRGBRouge(true);
  delay(500);
  commanderLedRGBRouge(false);
  commanderLedRGBVerte(true);
  delay(500);
  commanderLedRGBVerte(false);
  commanderLedRGBBleue(true);
  delay(500);
  commanderLedRGBBleue(false);

  commanderLedRGBRouge(true);
  commanderLedRGBVerte(true);
  commanderLedRGBBleue(true);
  delay(500);

  eteindreLeds();
}

void serialEvent()
{
  // La trame précédente n'a pas encore été traitée ?
  lireTrame();
}

void lireTrame()
{
  while (serie.available())
  {
    String trame = serie.readStringUntil(DELIMITEUR_FIN);
    #ifdef DEBUG_SERIAL
    Serial.print("Trame : ");
    Serial.println(trame);
    #endif
  }
  
}

void envoyerTrame()
{
  char trameEnvoi[64] = {FIN};

  // Trame état : $S1;c;t;b;e\r\n
  sprintf((char *)trameEnvoi, "%cS1;%d;%d;%d;%d\r\n", DELIMITEUR_DEBUT, 1, 0, 0, 1);
  serie.write((uint8_t*)trameEnvoi, strlen((char *)trameEnvoi));
}
