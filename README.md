CHANGES
-------

2.0.7

    * Fixed issue with curl update (curl (7.22.0-3ubuntu4.8) precise-security; urgency=medium) where s3 communication
      fails because the bucket vhost format sub.domain.com.s3.amazonaws.com fails the SSL check since even a wildcard
      cert only functions on one level of sub domain.  The fix was to not prepend the bucket name (vhost style) and instead
      use s3.amazonaws.com/BUCKETNAMEHERE/filename for all s3 operations.  ticket #166

  -- greg.brown May 05, 2014


2.0.6

    * Fixed curl CURLOPT_SSL_VERIFYHOST deprecated issue..  ticket #149
    * Modified API Version ticket #151
    * Added Jimmy's changes for authenticate method

  -- nick a 28 Jan 2014


2.0.5

    * initial versioned commit

  -- rus  Fri, 4 Feb 2011 16:15 EST
