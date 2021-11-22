/**
*
* @file src/main.cpp
* @brief Programme principal simulateur chauffage
* @author Thierry Vaira
* @version 0.1
*
*/
#include <Arduino.h>
#include <Wire.h>

#include "sonde.h"
#include "communication.h"
#include "shield.h"

//#define DEBUG
//#define TESTS_SHIELD

#define PERIODE_ACQUISITION 5000 //!< période d'acquisition en millisecondes
#define INTERROGATION   1 //!< par trame de requête/réponse
#define PERIODIQUE      2 //!< par trame périodique

#define MODE INTERROGATION //!< choix du mode de communication
//#define MODE PERIODIQUE

String trame; //!< la trame de communication

void setup()
{
  Serial.begin(9600);
  #ifdef DEBUG
  Serial.println(F("Simulateur + Shield 321MAKER"));
  #endif

  initialiserLiaisonSerie();
  initialiserCapteurs();
  initialiserShield();
  eteindreLeds();
}

void loop()
{
  #ifdef TESTS_SHIELD
  testerBuzzer();
  testerLeds();
  #endif

  modifierPeriode(PERIODE_ACQUISITION);
  while(true)
  {
    if(lireTrame(trame))
    {
      traiterTrame(trame);
    }

    bool etat = acquerir();
    #if MODE == PERIODIQUE
    if(etat)
    {
      String trameDonneesSonde = getDonneesSonde();
      envoyerTrame(trameDonneesSonde);
      #ifdef TESTS_SHIELD
      lireEntreesAnalogiques();
      #endif
    }
    #endif
  }
}
