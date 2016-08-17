# CHANGELOG


## v2.0.9
* issue #2: Use `apcu` functions when available.
* issue #1: Remove CURLOPT_CLOSEPOLICY.


## v2.0.8
* issue #1: Fix curl_setopt removed paramter. see http://stackoverflow.com/questions/27939776/curlclosepolicy-least-recently-used-not-defined-anymore-in-php-5-6-4-is-it-bett


## v2.0.7
* Fixed issue with curl update (curl (7.22.0-3ubuntu4.8) precise-security; urgency=medium) where s3 communication
  fails because the bucket vhost format sub.domain.com.s3.amazonaws.com fails the SSL check since even a wildcard
  cert only functions on one level of sub domain.  The fix was to not prepend the bucket name (vhost style) and instead
  use s3.amazonaws.com/BUCKETNAMEHERE/filename for all s3 operations.  ticket #166


## v2.0.6
* Fixed curl CURLOPT_SSL_VERIFYHOST deprecated issue..  ticket #149
* Modified API Version ticket #151
* Added Jimmy's changes for authenticate method


## v2.0.5
* initial versioned commit
