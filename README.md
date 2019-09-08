# mailer-service

Microservice (Laravel) for sending mails

#### Mailer API

When hitting "/api/sendmail" a test e-mail will be send to the test user. This service will use 
first Sendgrid and if it fails, it will use the fallback service of Mailjet. 

All e-mail sending actions are queued (with 10 secs delay). After receiving a response of the third
party e-mail services a event is fired which will trigger a listener. Todo: This listener is calling a 
a 'Log service' which will create an entry in the database (email, status, error, etc.). 

After that a new event/listener is triggered for sending the http client a message so it can update it's
user interface (new row in a table, green/red light for the e-mail status etc.)

Make sure you update your .env for the secrets.

Done:
1. Init Docker
2. Install a fresh Laravel app
3. Register to 2 mailer services (Mailjet and Sendgrid)
4. API Endpoint (JSON-RPC?)
5. Service
4. Job
7. Event/listener

Todo:
1. Logging database
2. UnitTest
3. artisan command

Bonus todo:
1. Client Vue app (new repos)

#### commands

sudo docker-compose exec web php /srv/app/artisan

sudo docker-compose run composer require "swiftmailer/swiftmailer:^6.0"

