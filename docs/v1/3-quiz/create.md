# **Create New quiz**

## POST ``/api/v1/quizzes``

**POST Params**:
- ``id`` : quiz id
- ``category_id`` :  category
- ``title`` : quiz title
- ``description`` :  quiz description
- ``start_date`` :  start date
- ``duration`` :  max duration

<br><hr><br>

## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // created quiz data
}
```