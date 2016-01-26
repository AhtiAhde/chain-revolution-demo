#
# Multichain version 1.0 alpha 15
#
# Copyright (c) Coin Sciences Ltd - www.multichain.com
#
# Distributed under the GPLv3 software license, see the accompanying
# file COPYING or http://www.gnu.org/licenses/gpl-3.0.txt
#

Download and install:
http://www.multichain.com/download-install/

Getting started:
http://www.multichain.com/getting-started/

API commands:
http://www.multichain.com/developers/json-rpc-api/

Developer guide:
http://www.multichain.com/developers/

White paper:
http://www.multichain.com/download/MultiChain-White-Paper.pdf


CHANGELOG
---------

Version 1.0 alpha 15 - 7 January 2016
* Moved to libsec256k1 for faster signature creation and verification
* Fixed bug when starting multichaind with reindex=1
* Several other minor bug fixes and improvements

Version 1.0 alpha 14 - 30 December 2015
* Added activate permission which can set connect/send/receive permissions only
* Added optional protocol version parameter to multichain-util
* Added miningrequirespeers parameter to multichaind
* Fixed mining deadlock where mining permission is assigned to an inactive node
* Several other minor bug fixes and improvements

Version 1.0 alpha 13 - 15 December 2015
* Added new APIs for detailed viewing of wallet transactions:
  listwallettransactions, getwallettransaction, listaddresstransactions
  and getaddresstransaction
* Skipped change outputs in listtransactions and gettransaction
* Fixed bug preventing P2SH multisig transactions with metadata
* Renamed 'genesistxid' to 'issuetxid' for asset issues in API responses
* Several other minor bug fixes and improvements

Version 1.0 alpha 12 - 26 November 2015
* Added new APIs for easy sending of transactions with metadata:
  sendwithmetadata and sendwithmetadatafrom
* Added verbose parameter to getaddresses command to give more information
* Included unconfirmed change in getassetbalances/gettotalbalances
* Fixed other assets moving when creating an asset or assigning permissions
* Fixed RPC server bug in chains where anyone-can-connect=true

Version 1.0 alpha 11 - 19 November 2015
* Added verbose parameter to listpermissions command
* Added includeLocked parameter to getaddressbalances/getassetbalances
* Added disablerawtransaction API to disable an offer of exchange
* Added gettotalbalances API to bypass bitcoin-style accounts
* Added txid and vout fields to verbose decoderawexchange output
* Added support for watch-only addresses in getaddressbalances/getassetbalances
* Improved several error messages for clarity
* Fixed several bugs in new coin selection, including for native currency
* Fixed rare crash in listassets and missed transactions after importaddress

Version 1.0 alpha 10 - 12 November 2015
* Added getaddresses API to list all wallet addresses
* Added support for blockchain reindexing with reindex runtime parameter
* New coin selection procedure to maintain separation between assets
* Fixed wallet state bug when spending output from preparelockunspent
* Several other minor bug fixes and improvements

Version 1.0 alpha 9 - 21 October 2015
* Added support for bitcoin-style handshaking where anyone-can-connect=true
* Fixed problems with blockchains where chain-protocol=bitcoin
* Several other minor bug fixes and improvements

Version 1.0 alpha 8 - 14 October 2015
* Added APIs for sending funds and other operations from specific addresses:
  getaddressbalances, sendassetfrom, sendfromaddress, preparelockunspentfrom,
  grantfrom, issuefrom, revokefrom
* Default proof-of-work difficulty reduced to 16 bits
* Set txindex=1 as default to help blockchain querying

Version 1.0 alpha 7 - 8 September 2015
* Added API for appending extra data to transactions: appendrawmetadata
* preparelockunspent JSON-RPC API accepts native asset value
* Sorting listassets JSON-RPC API results
* Fixed some bugs relating to send permission revocation

Version 1.0 alpha 6 - 23 August 2015
* Added APIs for building atomic exchange transactions: preparelockunspent,
  createrawexchange, appendrawexchange, decoderawexchange 
* Extended sendtoaddress to allow sending of multiple assets
* Fixed some bugs relating to datadir and network names

Version 1.0 alpha 5 -  6 August 2015
* Added combineunspent API to combine unspent transactions
* Added automatic combining of unspent transactions
* Improved performance of coin selection in large wallets
* Improved speed of peer discovery and connection
* Fixed some concurrency-related bugs
* Increased maximum orphan pool size

Version 1.0 alpha 4 - 22 July 2015
* Ignore zero-value outputs from coinbase transactions
* Support for backwards-compatible protocol upgrades
* Earlier creation of multichain.conf
* Added first-block-reward parameter
* Accept multiple addresses in listpermissions

Version 1.0 alpha 3 - 14 July 2015
* Support for Ubuntu 12.04+, CentOS 6.2+, Debian 7+, Fedora 15+, RHEL 6.2+
* Extended output for listpermissions showing changes pending admin consensus

Version 1.0 alpha 2 - 6 July 2015
* Disconnecting nodes without connect permission
* Disconnecting from seed node after initial blockchain synchronization
* Memory pool exchange after initial blockchain synchronization
* Disconnecting block bug fixes for permissions and assets
* Resolved mining deadlocks in rare edge cases
* Case-insensitive asset names

Version 1.0 alpha 1 - 23 June 2015
* First release

