/**
*
* @file lib/communication/communication.cpp
* @brief Définition des fonctions pour gérer la communication série
* @author Thierry Vaira
* @version 0.1
*
*/
#include "communication.h"
#include "sonde.h"
#include "shield.h"
#include "../../include/pinout.h"

// cf. https://www.arduino.cc/en/Reference/softwareSerial
static SoftwareSerial liaisonSerie(RX, TX);

/**
* @brief Initialise la liaison série
*/
void initialiserLiaisonSerie()
{
    pinMode(RX, INPUT);
    pinMode(TX, OUTPUT);
    liaisonSerie.begin(DEBIT_SERIE);
}

/**
* @brief Lit une trame sur la liaison série
* @param trame String la trame reçue
* @return bool vrai si une trame a été reçue sinon faux
*/
bool lireTrame(String &trame)
{
  trame = "";
  if(liaisonSerie.available())
  {
    trame = liaisonSerie.readStringUntil(DELIMITEUR_FIN);
    // protocole ?
    if(!trame.startsWith("$"))
        return false;
    #ifdef DEBUG_COMMUNICATION
    Serial.print(F("Trame recue : "));
    Serial.println(trame);
    //Serial.println(trame.length());
    #endif
  }
  return (trame.length() > 0);
}

/**
* @brief Envoie une trame sur la liaision série
* @param trame String la trame à envoyer
*/
void envoyerTrame(String trame)
{
  liaisonSerie.write(trame.c_str(), trame.length());
  #ifdef DEBUG_COMMUNICATION
  Serial.print(F("Trame emise : "));
  Serial.print(trame);
  #endif
}

/**
* @brief Traite une trame
* @param trame String la trame à traiter
* @return bool vrai si une trame a été traitée sinon faux
*/
bool traiterTrame(String &trame)
{
  bool valide = false;
  trame.toUpperCase();

  if(trame.length() < 1)
    return false;

  if(trame.startsWith("$SET;")) // mode commande ?
  {
    if(trame.indexOf("CHAUFFAGE;") != -1)
    {
        if(trame.indexOf("ON") != -1)
        {
          commanderLedRouge(true);
          valide = true;
        }
        else if(trame.indexOf("OFF") != -1)
        {
          commanderLedRouge(false);
          valide = true;
        }
    }
  }
  else if(trame.startsWith("$GET;")) // mode requête/réponse ?
  {
    if(trame.indexOf("SONDE") != -1)
    {
      String trameDonneesSonde = getDonneesSonde();
      envoyerTrame(trameDonneesSonde);
      valide = true;
    }
  }
  else
  {
    #ifdef DEBUG_COMMUNICATION
    Serial.print(F("Trame inconnue : "));
    Serial.print(trame);
    #endif
  }

  if(valide)
    trame = "";

  return valide;
}

/*
void serialEvent()
{
}
*/
