EasyTaxi Cache Failover
========

Instructions
------
Hello, this is a simple challenge to test your skills on Symfony, PHPUnit and Cache.

You will see that we have a Controller\CustomerController. It basically gives you the following capabilities:

* Create multiple customers by sending an json to /customers/ endpoint
* Delete all customers
* Consult all customers

So what do you have to do?

* We want you to obtain the reponse of GET customers method from a Cache Server.
* Since you know that this information is immutable until someone hits POST/DELETE customer methods, you shall not hit the Database if cache information is available.
* To let the things a little bit interesting you will have to implement an failover: If Cache Server goes down, you have to hit the Database and this needs to be transparent to our end user, not an Error page!
* Make Unit and Functional tests to ensure everything is working fine.
* You will recieve a thumbs up for good Commit Messages and SOLID knowledge.

Minimum Requirements
---------
* PHP 5.4
* [MongoDB driver](http://php.net/manual/en/mongo.installation.php#mongo.installation.nix)
* Mongo 2.6
* Redis 3

Installation
------
* $ git clone git@bitbucket.org:easytaxi/interview-cachefailover.git
* $ cd interview-cachefailover/
* $ composer install
* $ php app/console server:run
* Open http://127.0.0.1:8000/customers in your browser (check if everything is fine)
* You can test your database operation by doing a POST into /customers/
* $ curl http://127.0.0.1:8000/customers/ -X POST -d '[{"name":"leandro", "age":26}, {"name":"marcio", "age":30}]'
* Then check your MongoDB collection to see if customers were created or just call the action
* $ curl http://127.0.0.1:8000/customers/

Running tests
------
* Install PHPUnit
* In project root run: phpunit
