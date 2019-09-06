# mailer-service

Microservice (Laravel) for sending mails

## Mailer API

1. Install a fresh Laravel app
2. Register to 2 mailer services (Mailjet and Sendgrid)
3. Register to Mailcatcher
4. Job
5. Queue
6. Logging database
7. API Endpoint (JSON-RPC?)
8. UnitTest
9. Swiftmailer 

Api hit triggers event. 
Listener calls the Mailer service.
Service creates mail HTML and queues a job
Job call Service and mails 
Callback for status logging in database


## Bonus

Client app:
1. First Postman
2. Then a new Vue app (new repos)
