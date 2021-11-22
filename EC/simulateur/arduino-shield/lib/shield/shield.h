/**
*
* @file lib/shield/shield.h
* @brief Déclaration des fonctions pour le shield 321MAKER
* @author Thierry Vaira
* @version 0.1
*
*/
#ifndef SHIELD_H
#define SHIELD_H

#include <Arduino.h>

#define DEBUG_SHIELD

//#define SIMULATION

void initialiserShield();
void detecteEntree1();
void detecteEntree2();
void lireEntreesAnalogiques();
void commanderBuzzer(int tonalite);
void commanderLedRouge(bool etat);
void commanderLedBleue(bool etat);
void commanderLedRGBRouge(bool etat);
void commanderLedRGBVerte(bool etat);
void commanderLedRGBBleue(bool etat);
void eteindreLeds();
void testerBuzzer();
void testerLeds();

#endif // SHIELD_H