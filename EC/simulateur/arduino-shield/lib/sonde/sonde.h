/**
*
* @file lib/sonde/sonde.h
* @brief Déclaration des fonctions pour gérer le module Sonde
* @author Thierry Vaira
* @version 0.1
*
*/
#ifndef SONDE_H
#define SONDE_H

#include <Arduino.h>
#include <Adafruit_Sensor.h>
#include <DHT.h>

#define DEBUG_SONDE

#define PERIODE_ACQUISITION_DEFAUT      500 //!< période d'acquisition par défaut en millisecondes

void initialiserCapteurs();
float getTemperature();
uint16_t getHumidite();
String getTemperatureToString();
String getHumiditeToString();
String getDonneesSonde();
bool acquerir();
void modifierPeriode(unsigned long _periode);
unsigned long getPeriode();
bool estEcheance(unsigned long intervalle);

#endif // SONDE_H
