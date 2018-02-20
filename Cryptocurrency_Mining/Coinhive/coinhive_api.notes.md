`coinhive.com`

A Crypto Miner for your Website


Monetize Your Business With Your Users CPU Power 
- Spam Protection - Rate limit actions on your site
- Link Forwarding - Monetize shortlinks to your content
- In-Game Money - Offer rewards in your online games 
- Ad-Free Content - Run your site without ads 


An alternative to micro payments, artificial wait time in online games, intrusive ads and dubious marketing tactics. 
users can “pay” you with full privacy, without registering an account anywhere, without installing a browser extension and without being bombarded by shady ads. 
They will pay you with just their CPU power. 


Proof of Work Captcha

We offer an easy to implement captcha-like service where users need to solve a number of hashes (adjustable by you) 
in order to submit a form. This prevents spam at an inconvenience that is comparable to a classic captcha. 
All with the added benefit of earning you money.


An alternative for Google's reCaptcha

For an example, have a look at our signup page.

The captcha API is modeled after Google's reCaptcha. 
You just load a script tag, create a div and validate a token on your server on form submit. 
See the detailed implementation guide in the documentation. 




Proof of Work Shortlinks

If you have an URL youd like to forward your users to, you can create a cnhv.co shortlink to it.
The user has to solves a number of hashes (adjustable by you) and is automatically forwarded to the target URL afterwards.
Example: `cnhv.co/6bk` (this just forwards to the Monero article on Wikipedia)
You can create shortlinks directly in your control panel or through our HTTP API.



Flexible JavaScript API

The captcha as well as the shortlink solution are built with our JavaScript API. 
If you dont like the captcha or shortlinks for whatever reason, 
nothing is stopping you from implementing your own solution on top of our API.
The JavaScript API lets you associate solved hashes to specific users on your site. Users can solve 
hashes on your behalf in return for benefits you provide.
For example, you can give your users credits to stream videos, download files or browse you
site without ads in turn for running the miner.

Load the Coinhive Miner and start mining

```
<script src="https://coinhive.com/lib/coinhive.min.js"></script>
<script>
	var miner = new CoinHive.User('SITE_KEY', 'john-doe');
	miner.start();
</script>
```

Get the number of hashes solved by a user

```
curl "https://api.coinhive.com/user/balance?name=john-doe&secret=<secret-key>"
# {success: true, name: "john-doe" balance: 4096}
See the documentation for the details.
```



# My Hash Rate Seems Low - Why Monero?

Monero is different. To mine Monero, you have to calculate hashes with an algorithm called Cryptonight. 
This algorithm is very compute heavy and – while overall pretty slow – was designed to run well on consumer CPUs.
There are solutions to run the Cryptonight algorithm on a GPU instead, but the benefit is about 2x, not 10000x like for other algorithms used by Bitcoin or Ethereum. 
This makes Cryptonight a nice target for JavaScript and the Browser.
Of course, when running through JavaScript performance still takes a bit of a toll, but its not that bad. 
Our miner uses WebAssembly and runs with about 65% of the performance of a native Miner. 
For an Intel i7 CPU (one of the fastest desktop CPUs) you should see a hashrate of about 90h/s. 
A native miner would get to `140h/s`. 

Wed like to further close this gap and are working on solutions to do so.


Will This Work On My Site?

Technically yes, economically probably not. 
If you run a blog that gets 10 visits/day, the payout will be miniscule. 
For the captcha and shortlinks with a sensible hash goal (`1024-16384`) 
youll need to have a whole lot of users to make this worthwhile.

Implementing a reward system for your site or game where users have to keep mining for longer durations is far more feasible. 

With just `10-20` active miners on your site, you can expect a monthly revenue of about 0.3 XMR (~$70).

If you run a streaming video site, a community site, an online game or anything else where you can give your users an incentive
to run the miner for longer durations, then by all means: try it. 


Fair Payouts

We pay per solved hash. 
The payout rate is adjusted automatically every few hours based on the global difficulty of the network and the average reward per block. 
The payout rate is calculated like this: 
```
(<solved_hashes>/<global_difficulty>) * <block_reward> * 0.7
```

With the current network difficulty of `99.938G` (updated `Feb 01, 2018 - 21:01:41`) and average block reward of `5.53 XMR`:

`(<solved_hashes>/99937723286) * 5.53 XMR * 0.7 = 0.000039 XMR per 1M hashes`

I.e. you get 70% of the average XMR we earn. Unlike a traditional mining pool, this rate is fixed, 
regardless of actual blocks found and the luck involved finding them.

We keep `30%` for us to operate this service and to (hopefully) turn a profit.

We try to run this service with as much transparency as possible. 

If your users solve hashes, you get paid. Period. The minimum payout threshold is `0.02 XMR` (~$5).

Payouts are fully automated and are initiated every `2nd` hour, `12` times a day. 
If you reach the minimum payout threshold, youll automatically receive your money in the next batch.


---

https://coinhive.com/blog

Dec 21, 2017, the Coinhive Team 

Payment Policy Updates
- Payouts above 0.5 XMR are free, as always
- The payout minimum has been lowered to 0.02 XMR (previously 0.05 XMR)
- The fee for small payments has been lowered to 0.005 XMR (previously 0.01 XMR)
- Payments can now be made to integrated addresses, used by exchanges and web wallets
- Separate payment ids are still not supported, because we hate them and they need to die


---




## NEW MINER INSTANCE 
```
var miner = new CoinHive.Anonymous(
  YOUR_SITE_KEY,
  {  // OPTIONS
    threads: navigator.hardwareConcurrency,
    throttle: 0,
    forceASMJS: false,
    theme: 'light',  // or 'dark'
    language: 'auto'
  }
}) 
```

## START MINER WITH MODES 

`miner.start([mode]);`

MODES 
```
  CoinHive.IF_EXCLUSIVE_TAB     //  The miner only starts if no other tabs are mining. 
                                //  Ensures one miner is always running when at least one tab is open. 
                                //  Keeps pool reconnections to a minimum.
  
  CoinHive.FORCE_EXCLUSIVE_TAB  //  The miner will always start 
                                //  Immediately kill all miners in other tabs without CoinHive.FORCE_MULTI_TAB set

  CoinHive.FORCE_MULTI_TAB      //  The miner will always start. 
                                //  It will not announce its presence to other tabs, 
                                //  will not kill any other miners and can't be killed by other miners. 
                                //  This mode is used by the captcha and shortlinks. 
```


## Methods 
```
.start([MODE]);               // 
.stop();                      //

.isRunning();                 // true|false
.isMobile();                  // true|false
.didOptOut(seconds)           // Did the user click "Cancel" on the opt-in screen in the last `n` seconds.
                              // true|false
```


```
__EXAMPLE:__
```
// Only attempt to start and show the opt-in screen every 4 hours:
if (!miner.didOptOut(60 * 60 * 4)) {
	miner.start();
}
```

.on(event, callback);                           
.hasWASMSupport();                            
.getNumThreads();                           
.setNumThreads(numThreads);                           
.getThrottle();                           
.setThrottle(throttle);                           
.getToken();                            
.getHashesPerSecond();                            
.getTotalHashes([interpolate]);                           
.getAcceptedHashes();                           
```

 
 
## USER 

Create a new miner and credit all hashes to the specified user name. 
You can check a users balance and withdraw hashes for a user with our HTTP API.
Common use-cases include granting in-game currency or other incentives to a user account on your website in turn for running the miner.
Please only use the CoinHive.User miner if you later intend to retreive the number of hashes using the HTTP API. 
Dont use it to store random session names that you never read back.

`var user = new CoinHive.User(siteKey, userName [, options]);`


Parameters
```
siteKey   Your public Site-Key. See Settings > Sites.
userName   A unique identifier for the user account on your website. 
          This can be a userId, an email address, the users nick name or  
          if you dont want to share your user names with our service) 
          the md5 hash or otherwise obfuscated name of the user. 
          Max length: 128 chars, case insensitive.
options   An optional object which defines further settings. See Constructor Options. 
```




## EVENTS 

Specify a callback for an event.

`.on(event, callback(params) { })`

__Parameters__

```
event                    The name of the event you want to listen to.
callback(params){}       The function that should be called when the event is triggered.
```

## Event Types

```
  optin             The user took action on the opt-in screen (AuthedMine only). The params.status is either "accepted" or "canceled". See below for an example.
  open              The connection to our mining pool was opened. Usually happens shortly after miner.start() was called.
  authed            The miner successfully authed with the mining pool and the siteKey was verified. Usually happens right after open. In case the miner was constructed with CoinHive.Token, a token name was received from the pool.
  close             The connection to the pool was closed. Usually happens when miner.stop() was called or the CoinHive.Token miner reached its goal.
  error             An error occured. In case of a connection error, the miner will automatically try to reconnect to the pool.
  job               A new mining job was received from the pool.
  found             A hash meeting the pool's difficulty (currently 256) was found and will be send to the pool.
  accepted          A hash that was sent to the pool was accepted.
```


__Example Events:__

_authed_
```
miner.on('authed', function(params) {
  console.log('Token name is: ', miner.getToken());
});
```
_error_
```
miner.on('error', function(params) {
  if (params.error !== 'connection_error') {
    console.log('The pool reported an error', params.error);
  }
});
```

_optin_
```
miner.on('optin', function(params) {
  if (params.status === 'accepted') {
    console.log('User accepted opt-in');
  }
  else {
    console.log('User canceled opt-in');
  }
});
```
