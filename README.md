# TraductionWebApp
As part of the Web development project, you are asked to create an aggregator website and
comparator of training offers using the technologies taught (HTML5, CSS3, PHP, JQuery,
JavaScript, Ajax). Two parts of the project will have to be answered (each part will be evaluated
intermediary according to the dates mentioned at the end of the document).
The website offers an application for receiving documents to be translated into a language available in
the site according to the profile of the translators. The site must offer a simple and practical organization for access and
looking for a translator. It must have an administration part (Back-End) and a public part
(Front End). Data management must be done separately from presentation and processing (MVC).
# Part I: Design and implementation of the Front-End, data organization
and layout
In this part, you must design the Front-End part of the website in order to meet the requirements
following:
 a request for a quote to translate a document under
form form. The form contains the name, first name, email, telephone number, address,
the original and source languages, the type of translation desired (general, scientific, website),
specific comments and requests in a text box, the file of the document to be translated and
a captcha to eliminate the robots. The client will also have to indicate does he want a translator
sworn in for this translation.
Once the request has been validated, the client can optionally choose one or more translators in
a frame that will be displayed to him according to the criteria he has chosen. Translators will have profiles
audiences with their references, the number of documents translated and the average of the marks given by
customers.
The authenticated members of the site will have the possibility of managing their profiles in a dedicated page.
They can modify their personal information and consult the history of their quotes and
translations.
Customers will be able to rate translators after a completed translation. And all the users
"Clients and translators" may report to administrators any inappropriate behavior in
the profile of the latter.
Finally, the recruitment page will contain a form for the personal information of the
translator (the same as the client), a CV file with the mandatory ".pdf" extension, as well as
the possibility of loading up to 3 files of these references. A "sworn translator" box
is added, if it is selected then the candidate must load a file proving his
Oaths.
# Part II: Design and creation of the Back-End and site functionalities
The second part concerns the administration part of the site (back-End) and must meet the requirements
following:
The administration part consists of 5 categories arranged in the form of a frame with an image
adequate.
The first category is the management of translators. A table of translators is displayed where we
can modify, delete or block a translator, you can also filter and sort the list of
translators. By clicking on his name we can see in a separate page his detailed profile, his
quote and translation history as well as details of notes and complaints made.
The second category will offer the same functionality but for customer management.
The third category concerns the management of documents submitted on the site. The documents are
displayed in a table with their date of submission, their type, the client who submitted it, the
translator who processed it and was it only a quote. We can sort, filter and delete
documents.
The fourth category concerns statistics on the various information related to customers,
translators and documents. The administrator will be able to select parameters and see the
statistics in figures and graphs using an appropriate tool (JpGraph, Google
Chart ...). The site must offer at least the following statistics: (
o Number of translations made between 2 dates
o Number of translations made by a translator between 2 dates
o Number of translations made for a client between 2 dates
o The same for quotes.
