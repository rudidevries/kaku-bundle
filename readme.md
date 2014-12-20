# KAKU Bundle - 'Klik aan Klik uit'

This library provides a basic object interface for calling a the KAKU program to switch devices with the Raspberry Pi and a 433mhz transmitter.

A complete description of how to setup the KAKU program on the Raspberry Pi is found [here](http://weejewel.tweakblogs.net/blog/8665/lampen-schakelen-met-een-raspberry-pi.html) in Dutch.

This bundle integrates the [rudidevries/kaku](https://github.com/rudidevries/kaku) libary in a Symfony project. It provides the configuration and service settings.


## Installation
The best way to add the library to your project is using [composer](http://getcomposer.org).

	$ composer require rudidevries/kaku-bundle
	
The bundle needs to be loaded by the AppKernel.

	public function registerBundles()
    {
        $bundles = array(
    		....
    		new RudideVries\Bundle\KakuBundle\KakuBundle(),
    		....
    	);    
    	
    	return $bundles;
    }
	
And the configuration must be added to your project config file. Example:

	kaku:
    ssh:
        host: 192.168.0.196
        username: username
        public_key: /path/to/.ssh/id_rsa.pub
        private_key: /path/to/.ssh/id_rsa
    command: sudo /path/to/kaku

	
## Usage

A very basic example:

	$channel = new Channel($description, $letter, $number);

    $switcher = $this->get('kaku.kaku.switcher');
    $switcher->sendOn($channel);
    $switcher->sendOff($channel);
    
Offcourse you can put a collection of channels in a service of your own, to make things more flexible.