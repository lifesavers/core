SmartConsent
============

Building a SmartConsent console to fight and reduce the rate of on campus sexual assault. The system would be capable, in a more complex configuration, of basic biometric identification [fingerprint], gas alcohol readings, modal and state/process display, wireless communication, program and data storage, signal processing, over-air updating, consent/retraction/alert recording, panic button operation, battery or power draw, and more.




Thesis
======
A system that comprises a SmartConsent module paired with a server-cluster or mesh network with routed alerts to a Consent First Response (CFR) Team on-site in campus housing will empower men and women and _greatly_ deter sexual coercion, and more broadly, coercion of all kinds on campus. Such a system would see use in a number of environments both domestic and international, and in a simpler or adapted state as a ubiquitous bedside panic button might work in other institutional housing environments as well, including state and federal prisons, to help cut away at acts of violence, assault, and coercion of all kinds.

Materials and Methods
=====================
Using an Arduino Yún.

Connections
===========
###Digital In/Out###
Pin 0: [Kept open for easy USB program uploads]   
Pin 1: [Kept open for easy USB program uploads]   
Pin 2: Green (for Adafruit Optical Fingerprint Sensor) [As Digital Input Pin 14]   
Pin 3: White (for Adafruit Optical Fingerprint Sensor)  [As Digital Input Pin 15] (~)  
Pin 4: Momentary Touch Button (Headboard)  
Pin 5: (~)  
Pin 6: (~)  
Pin 7:   
Pin 8:  
Pin 9: RED LED "Code Red" Indicator (~)  
Pin 10: GREEN LED "Consent" Indicator (~)  
Pin 11: BLUE LED "Code Blue" "Indicator (~)  
Pin 12:   
Pin 13:    

~ Signifies PWM (Pulse-Width Modulation) capability.

###Analog In###
Pin 0: Analog Alcohol Gas Sensor  
Pin 1:   
Pin 2:   
Pin 3: green_inactivation_button for Resetting from Green to Standby   
Pin 4: Green [Yellow in a Pinch] (for Flex Membrane Touch Button)  
Pin 5:    


###Resistors Needed###
180 Ohm [Brown, Grey, Black, Black]  
100 Ohm [Brown, Black, Black, Black]  
100 Ohm [Brown, Black, Black, Black]  
