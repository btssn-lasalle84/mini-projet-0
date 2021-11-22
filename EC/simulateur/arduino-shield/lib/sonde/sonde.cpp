/**
*
* @file lib/sonde/sonde.cpp
* @brief Définition des fonctions pour gérer le module Sonde
* @author Thierry Vaira
* @version 0.1
*
*/
#include "sonde.h"
#include "../../include/pinout.h"

static DHT dht(D4, DHT11); //!< capteur de température et d'humidité
static float humidite = 0.; //!< valeur de l'humidité en %
static float temperature = -273.0; //!< valeur de la température en degré Celcius
static unsigned long periode = PERIODE_ACQUISITION_DEFAUT; //!< période d'acquisition des valeurs en millisecondes
static unsigned long tempsPrecedent = 0; //!< temps de la dernère acquisition en millisecondes

/**
* @brief Initialise les capteurs
*/
void initialiserCapteurs()
{
    #ifdef DEBUG_SONDE
    Serial.println(F("Initialisation capteur(s) sonde"));
    #endif
    dht.begin();
}

/**
* @brief Retourne la température
* @return float la température en °C
*/
float getTemperature()
{
  return temperature;
}

/**
* @brief Retourne l'humidité
* @return unsigned short l'humidité en %
*/
uint16_t getHumidite()
{
  return (uint16_t)humidite;
}

/**
* @brief Retourne la température
* @return String la température sous forme de chaîne de caratères
*/
String getTemperatureToString()
{
  char strMessageDisplay[8];
  sprintf(strMessageDisplay, "%.1f °C", temperature);
  return String(strMessageDisplay);
}

/**
* @brief Retourne l'humidité
* @return String l'humidité sous forme de chaîne de caratères
*/
String getHumiditeToString()
{
  char strMessageDisplay[8];
  sprintf(strMessageDisplay, "%u %%", (uint16_t)humidite);
  return String(strMessageDisplay);
}

/**
* @brief Retourne les données de la Sonde suivant le protocole
* @return String les données formatées pour le protocole
*/
String getDonneesSonde()
{
  String donnees;
  //$SONDE;TEMPERATURE;C;HUMIDITE;%;\r\n
  donnees = "$SONDE;" + String(temperature, 1) + ";" + "C" + ";" + String(humidite, 0) + ";" + "%" + "\r\n";
  #ifdef DEBUG_SONDE
  Serial.print(F("Trame       : "));
  Serial.print(donnees);
  #endif
  return donnees;
}

/**
* @brief Réalise l'acquisition des mesures de la Sonde à l'échéance de la période
* @return bool true si l'acquisition a été réalisée sino false
*/
bool acquerir()
{
  if(estEcheance(periode))
  {
    humidite = dht.readHumidity(false);
    temperature = dht.readTemperature(false);
    #ifdef DEBUG_SONDE
    Serial.print(F("Temperature : "));
    Serial.print(temperature);
    Serial.print(F(" C"));
    Serial.print(F(" - "));
    Serial.print(F("Humidité : "));
    Serial.print(humidite);
    Serial.println(F(" %"));
    #endif
    return true;
  }
  return false;
}

/**
* @brief Fixe une nouvelle période d'acquisition
* @param _periode unsigned long nouvelle période d'acquisition des mesures
*/
void modifierPeriode(unsigned long _periode)
{
  periode = _periode;
}

/**
* @brief Retourne la période d'acquisition
* @return unsigned long la période d'acquisition des mesures
*/
unsigned long getPeriode()
{
  return periode;
}

/**
* @brief Retourne true si l'échéance de la période fixée a été atteinte
* @param intervalle unsigned long
* @return bool true si l'intervalle entre deux périodes est arrivé à échéance
*/
bool estEcheance(unsigned long intervalle)
{
    unsigned long temps = millis();
    if (temps - tempsPrecedent >= intervalle)
    {
        tempsPrecedent = temps;
        return true;
    }
    return false;
}
