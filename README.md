## Local setup
**1. Database:** Import data from `/dump.sql` in your MySQL database.

**2. Setup .env file:** Copy `/.env.example` to `/.env`. Add database settings there.

**3. Run docker container:** To build the container run command `docker-compose up --build`. 

**4. Run application:** 
- http://localhost:5555/?email=userexist@gmail.com - to run app with existing user.
- http://localhost:5555/?email=userenotxist@gmail.com - to run app with non-existing user.
- http://localhost:5555/?email=incorrectmail.com - to run app with wrong email.