# WebAppArch
test
Routes to be implemented (with description)

GET: /classes (retrieve the list of classes, returning, for each record, title and lenght in minutes where deactivation_date is the timestamp associated to the end of the class, and activation_date is the timestamp associated to the beginning of the class)
GET: /classes/ID (retrieve the information related to a certain class, returning all the fields)
GET: /classes/ID/students (retrieve the list of students associated to a certain class returning id, gender and mother tongue)
GET: /classes/ID1/students/ID2 (retrieve the list of answers associated to a certain student ID2, for a certain class ID1, returning the title of the question (en english), and the answered value)
GET: /classes/ID1/students/ID2/avg (retrieve the average of the answers of a certain students ID2, associated to a certain class ID1)
GET: /classes/ID1/students/ID2/std (retrieve the standard deviation of the answers of a certain student ID2, associated to a certain class ID1)
GET: /classes/ID1/answers/ID2/avg (retrieve the average of the answers of question with ID2, associated to a certain class ID1)
GET: /classes/ID1/answers/ID2/std (retrieve the standard deviation of the answers of question with ID2, associated to a certain class ID1)
GET: /classes/ID1/answers/avg (retrieve the average of the answers, associated to a certain class ID1, grouped by questionID)
Installability/Portability

[0] the web-application is not portable at all, and cannot be configured due to hard-coded strings
[1] the web-application can be installed in another machine, but significant effort is required for configuration or updating
[2] the web-application can be installed on another machine correctly and intuitively with minimal effort.
MVC-correctness

[0] the MVC pattern has not been adopted at all
[1] the MVC pattern has been employed but in the wrong way (eg. wrong interaction of components, or assignment of wrong responsibilities to the components)
[2] the MVC pattern has been sufficiently employed but with some arguable choice (eg. decisions assigned to the controller rather than to the model or the view)
[3] the MVC pattern has been correctly employed and each component does what it is supposed to do
pdo DB manager and DAOs objects

[0] DAO objects have not been used at all
[1] an attempt to create DAO exists
[2] different DAOs have been created for different entities (eg. artists, songs, etc) and most of them work
[3] different DAOs have been created for different entities (eg. users, books, etc) and they all work.
DRY principle

[0] several blocks of code have been repeated several times
[1] some blocks of code could be better optimised and repetition avoided
[2] code is well written and never repeated (eg. good use of classes, methods, constants)
Authentication (you can hard-code username and password in the configuration file)

[0] an authentication mechanism is not present
[1] an attempt to build the authentication middleware is present but not working
[2] the authentication middleware is present and working
Response formats (based on the headers passed from the client)

[0] plain text has been used for returning responses
[1] just one response format has been implemented (eg. json)
[2] at least 2 response formats have been implemented (json, xml, csv)
Response HTTP codes

[0] http response codes are not set/returned at all
[1] response codes are partially set/returned
[2] response codes are always set/returned for every scenario
ROUTES

1.75 points for each route implemented (max 15.75 points)
Extra functionality 1 ( d3js.org )

2 point awarded for the extra functionality. The x-axis are the questions in the db. The y-axis is the average for that question. This is associated to requirement 9
Extra functionality 2

1.25 point awarded for an extra functionality chosen by student
