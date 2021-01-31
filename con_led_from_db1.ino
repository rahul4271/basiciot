
#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>

#include <ESP8266HTTPClient.h>

#include <WiFiClient.h>

ESP8266WiFiMulti WiFiMulti;
int x;
void setup() {
pinMode(LED_BUILTIN,OUTPUT);  
pinMode(D1,OUTPUT);
pinMode(D6,OUTPUT);
pinMode(D8,OUTPUT);
  Serial.begin(115200);
  // Serial.setDebugOutput(true);

  Serial.println();
  Serial.println();
  Serial.println();

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("ifiber", "   ");
  WiFiMulti.addAP("rahul", "rahul12");

}

void loop() {
  x=1;
  x++;
  Serial.print(x);
  // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {
     for (x=0;x<9;x++){

    WiFiClient client;

    HTTPClient http;

    Serial.print("[HTTP] begin...\n");
    if (http.begin(client, "http://basiciot.000webhostapp.com/led/first2.php?status="+String(x))) {  // HTTP

      x++;
      Serial.print("[HTTP] GET...\n");
      // start connection and send HTTP header
      int httpCode = http.GET();

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.printf("[HTTP] GET... code: %d\n", httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          String payload = http.getString();
          Serial.println(payload);
          payload.trim();
          Serial.println(payload.length());
          String ON="ON";
          String OFF="OFF";
if(payload=="1OFF2OFF3OFF"|| payload=="1OFF2ON3OFF"|| payload=="1OFF2OFF3ON" || payload=="1OFF2ON3ON" ){  //1OFF2OFF3OFF 1OFF2ON3OFF 1OFF2OFF3ON 1OFF2ON3ON
  digitalWrite(D1,LOW);
}
 if(payload=="1ON2OFF3OFF"|| payload=="1ON2ON3OFF"|| payload=="1ON2OFF3ON" || payload=="1ON2ON3ON"){  //1ON2OFF3OFF 1ON2ON3OFF 1ON2OFF3ON 1ON2ON3ON
  digitalWrite(D1,HIGH);
}
 if(payload=="1OFF2OFF3OFF"|| payload=="1ON2OFF3OFF"|| payload=="1OFF2OFF3ON"|| payload=="1ON2OFF3ON"){ //1OFF2OFF3OFF 1ON2OFF3OFF 1OFF2OFF3ON 1ON2OFF3ON
  digitalWrite(D6,LOW);
}
 if(payload=="1OFF2ON3OFF"|| payload=="1ON2ON3OFF"|| payload=="1OFF2ON3ON"|| payload=="1ON2ON3ON"){ //1OFF2ON3OFF 1ON2ON3OFF 1OFF2ON3ON 1ON2ON3ON
  digitalWrite(D6,HIGH);
}
 if(payload=="1OFF2OFF3OFF"|| payload=="1ON2OFF3OFF"|| payload=="1OFF2ON3OFF"||payload=="1ON2ON3OFF"){ //1OFF2OFF3OFF 1ON2OFF3OFF 1OFF2ON3OFF 1ON2ON3OFF
  digitalWrite(D8,LOW);
}
 if(payload=="1OFF2OFF3ON"|| payload=="1OFF2ON3ON"|| payload=="1ON2OFF3ON"|| payload=="1ON2ON3ON"){ // 1OFF2OFF3ON 1OFF2ON3ON 1ON2OFF3ON 1ON2ON3ON
  digitalWrite(D8,HIGH);
}
   delay(1000);

       x++;
        }
      } else {
        Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        pinMode(LED_BUILTIN,LOW);
        delay(300);
        pinMode(LED_BUILTIN,HIGH);
        delay(300);
        pinMode(LED_BUILTIN,LOW);
        delay(300);
      }

      http.end();
    } else {
      Serial.printf("[HTTP} Unable to connect\n");
       pinMode(LED_BUILTIN,LOW);
        delay(300);
        pinMode(LED_BUILTIN,HIGH);
        delay(300);
        pinMode(LED_BUILTIN,LOW);
        delay(300);
    }
     }
  }

  delay(1000);
}
