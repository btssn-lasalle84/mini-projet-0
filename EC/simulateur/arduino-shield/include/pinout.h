#ifndef PINOUT_H
#define PINOUT_H

#include <Arduino.h>

// Shield 321MAKER

#define FOR_WEMOS   1
#define FOR_ARDUINO 2

//#define SHIELD_321MAKER FOR_WEMOS
#define SHIELD_321MAKER FOR_ARDUINO

#if SHIELD_321MAKER == FOR_WEMOS
/*
  RGB :
  D9 -> 13 = RGB ROUGE
  D10 -> 5 = RGB BLEUE
  D11 -> 23 = RGB VERTE

  Leds :
  D12 -> 19 = LED ROUGE
  D13 -> 18 = LED BLEUE

  Buttons :
  D2 -> 26 = SW1
  D3 -> 25 = SW2

  DHT11 :
  D4 -> 17

  Buzzer :
  D5 -> 16

  IR :
  D6 -> 27

  Rotation :
  A0 -> 2

  Ligth :
  A1 -> 4

  LM35 :
  A2 -> 35

  D0 = RXD
  D1 = TXD
 */

static const uint8_t AN0   = 2;  // Rotation
static const uint8_t AN1   = 4;  // Light
static const uint8_t AN2   = 35; // LM35
static const uint8_t AN3   = 34; // Libre
static const uint8_t AN4   = 36;
static const uint8_t AN5   = 39;

static const uint8_t D0   = 3;  // RX
static const uint8_t D1   = 1;  // TX
static const uint8_t D2   = 26; // SW1
static const uint8_t D3   = 25; // SW2
static const uint8_t D4   = 17; // DHT11
static const uint8_t D5   = 16; // Buzzer
static const uint8_t D6   = 27; // IR
static const uint8_t D7   = 14; // Libre
static const uint8_t D8   = 12; // Libre
static const uint8_t D9   = 13; // RGB Rouge
static const uint8_t D10  = 5;  // RGB Bleu
static const uint8_t D11  = 23; // RGB Vert
static const uint8_t D12  = 19; // Led Rouge
static const uint8_t D13  = 18; // Led Bleue
#elif SHIELD_321MAKER == FOR_ARDUINO
static const uint8_t AN0   = A0; // Rotation
static const uint8_t AN1   = A1; // Light
static const uint8_t AN2   = A2; // LM35
static const uint8_t AN3   = A3; // Libre
static const uint8_t AN4   = A4; // SDA
static const uint8_t AN5   = A5; // SCL

static const uint8_t D0   = 0; // RX
static const uint8_t D1   = 1; // TX
static const uint8_t D2   = 2;  // SW1
static const uint8_t D3   = 3;  // SW2
static const uint8_t D4   = 4;  // DHT11
static const uint8_t D5   = 5;  // Buzzer
static const uint8_t D6   = 6;  // IR
static const uint8_t D7   = 7;  // Libre
static const uint8_t D8   = 8;  // Libre
static const uint8_t D9   = 9;  // RGB Rouge
static const uint8_t D10  = 10; // RGB Bleu
static const uint8_t D11  = 11; // RGB Vert
static const uint8_t D12  = 12; // Led Rouge
static const uint8_t D13  = 13; // Led Bleue
#endif
static const uint8_t Rotation   = AN0;
static const uint8_t Light      = AN1;
static const uint8_t LM35       = AN2;
static const uint8_t RX         = D7; //D0;
static const uint8_t TX         = D8; //D1;
static const uint8_t SW1        = D2;
static const uint8_t SW2        = D3;
static const uint8_t DHT11      = D4;
static const uint8_t BUZZER     = D5;
static const uint8_t IR         = D6;
static const uint8_t RGB_ROUGE  = D9;
static const uint8_t RGB_BLEUE  = D10;
static const uint8_t RGB_VERTE  = D11;
static const uint8_t LED_ROUGE  = D12;
static const uint8_t LED_BLEUE  = D13;
#endif
