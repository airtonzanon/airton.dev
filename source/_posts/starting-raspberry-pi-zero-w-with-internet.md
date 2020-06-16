---
createdAt: 2019-07-25
title: Starting a Raspberry Pi Zero W with network
language: EN

---

**1.** Flash Raspbian Jessie full or Raspbian Jessie Lite onto the SD card with [etcher](https://www.balena.io/etcher/).  
**2.** Once Raspbian is flashed, open up the boot partition (in Windows Explorer, Finder etc) and add to the bottom of the ```config.txt``` file ```dtoverlay=dwc2``` on a new line, then save the file.    
**3.** Create a new file simply called ```ssh``` in the SD card as well. By default, SSH is now disabled so this is required to enable it. **Remember** - Make sure your file doesn't have an extension (like .txt etc)!    
**4.** Finally, open up the ```cmdline.txt```. Insert ```modules-load=dwc2,g_ether``` after ```rootwait```.  
**5.** That's it, eject the SD card from your computer, put it in your Raspberry Pi Zero and connect it via USB to your computer. It will take up to 90s to boot up (shorter on subsequent boots). It should then appear as a USB Ethernet device. You can SSH into it using ```raspberrypi.local``` as the address.  
**6.** If it doesn't work, try to install [bonjour print service](https://support.apple.com/kb/DL999?locale=en_US), then try again.

#### > for network

**7.** Find all the WiFi Networks around you: `sudo iwlist wlan0 scan | grep ESSID`.  
**7.1** Generate the wpa access password: `wpa_passphrase NETWORK_ESSID NETWORK_PASSWORD`.  
**8.** It will generate something like this:
```
network={                                                                   
        ssid="NETWORK_ESSID"                                                 
        #psk="NETWORK_PASSWORD"                                                  
        psk=e0fa796c9d43d1c5e75e0c4fd77695e97cbccdb180ec2e5c10ab523hh6956666
}                                                                           
```  
**9.** Copy it and then edit this file `sudo nano /etc/wpa_supplicant/wpa_supplicant.conf`  
**10.** Paste it below everything that we have there.

#### > for locale
[https://daker.me/2014/10/how-to-fix-perl-warning-setting-locale-failed-in-raspbian.html](
https://daker.me/2014/10/how-to-fix-perl-warning-setting-locale-failed-in-raspbian.html)
