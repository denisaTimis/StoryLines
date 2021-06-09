openapi: 3.0.0
info:
  title: WWN
  description: 'Web application made for creating and browsing articles'
  termsOfService: 'http://swagger.io/terms/'
  contact:
    email: 'robert.nagy98@e-uvt.ro, denisa.timis99@e-uvt.ro, paula.pitileac99@e-uvt.ro'
  license:
    name: 'Apache 2.0'
    url: 'http://www.apache.org/licenses/LICENSE-2.0.html'
  version: 1.0.0
paths:
  '/user/{id}':
    get:
      summary: 'Gets a user from the database through the id'
      parameters:
        -
          name: id
          in: path
          description: 'Id of user to return'
          required: true
          schema:
            type: integer
      responses:
        default:
          description: 'An instance of a user'
  '/article/{id}':
    get:
      summary: 'Gets a article from the database through the id'
      parameters:
        -
          name: id
          in: path
          description: 'Id of article to return'
          required: true
          schema:
            type: integer
      responses:
        default:
          description: 'The title of the article and the first and last name of the author'
  '/paragraph/{id}':
    get:
      summary: 'Gets a paragraph from the database through the id'
      parameters:
        -
          name: id
          in: path
          description: 'Id of paragraph to return'
          required: true
          schema:
            type: integer
      responses:
        default:
          description: 'The content of the paragraph, the title of the article and the release date'
  /:
    get:
      summary: 'Renders the home page'
      responses:
        default:
          description: 'Home page gets loaded'
