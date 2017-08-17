This project is done using Laravel 5.4. Laravel is a great framework with lots of support and a big community behind it, and I have personally used it in several projects with great success.

You should be able to unzip the files in your web folder and just run, no need to get composer instalation.

To use the API use the following URL: http://{yourservername}/goustoApiLaravel/api/v1/recipes
The code follows the restful routing with the usual verbs (POST, GET, DELETE etc). 
There is an additional function updateStarRating which does the star rating update.

There shuld be automated tests for this API, most likely behat and phpUnit, but I didn't have time to implement these. In the real application, of course these would be written, and required by CI. 

As I didn't know how exactly the data is formatted and validated, I made a few assumptions. Few of the fields are set as required, most DB tables have this. Validation is performed for these fields both on insert and update. Also, some of the fields were probably enum types, but are created in the database as strings. 

I have tried to handle errors and use sensible error messages where necessary. I have used standard HTTP response codes with appropriate.
The data is retrieved using a transformer, and again I made a few assumptions as to what data is necessary. As we are using transformers, we can easily separate the data for different types of request.
