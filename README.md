Cache Fail over Symfony
========

Docker
---------

* `cd ./docker`
* `docker-compose up --build`

* PS: Wait composer container exit, then you'll may be ready to start

Running tests with docker
------

* You'll need to do the before step
* `docker exec -it php phpunit`

How to know if cache over is working
--------

* After you did these steps before, run it:
* `curl http://127.0.0.1:8000/customers/ -X POST -d '[{"name":"leandro", "age":26}, {"name":"marcio", "age":30}]'`
* Then it may return success. After that, run it:
*  `curl http://127.0.0.1:8000/customers/ -X GET`
* Then it may return all data in mongodb. After second hit, it'll get data from redis.
* To verify if cache fail over is working, run it:
* `docker stop redis`
* It'll stop redis container, then run it again:
*  `curl http://127.0.0.1:8000/customers/ -X GET`
* Right now you'll see the data, but it was returned by mongodb
* Just to finish, run it:
*  `curl http://127.0.0.1:8000/customers/ -X DELETE`
