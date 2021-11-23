/**
*
* @file lib/communication/communication.h
* @brief Déclaration des fonctions pour gérer la communication série
* @author Thierry Vaira
* @version 0.1
*
*/
#ifndef COMMUNICATION_H
#define COMMUNICATION_H

#include <Arduino.h>
#include <SoftwareSerial.h>

#define DEBUG_COMMUNICATION

#define DEBIT_SERIE       9600  //!< le débit de la liaison série
#define DELIMITEUR_DEBUT  '$'   //!< le délimiteur de début de trame
#define DELIMITEUR_FIN    '\n'  //!< le délimiteur de fin de trame
#define FIN               0x00  //!< le fin de chaîne

void initialiserLiaisonSerie();
bool lireTrame(String &trame);
void envoyerTrame(String trame);
bool traiterTrame(String &trame);

#endif // COMMUNICATION_H