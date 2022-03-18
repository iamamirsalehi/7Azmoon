# **Update quiz**

## PUT ``/api/v1/quizzes``

**POST Params**:
- ``id`` : quiz id (required)
- ``category_id`` :  category
- ``title`` : quiz title
- ``description`` :  quiz description
- ``start_date`` :  start date
- ``duration`` :  max duration
- ``is_active`` :  activation status


<br><hr><br>

## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // updated quiz data
}
```