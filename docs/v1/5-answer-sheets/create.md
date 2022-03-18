# **Create New answerSheet**

## POST ``/api/v1/answer-sheets``

**POST Params**:
- ``id`` : answerSheet id
- ``quiz_id`` :  quiz id
- ``answers`` : json {12 : 1,14:3, ...}    ```// question:selected-option```
- ``status`` :  rejected|passed
- ``score`` :  null|int
- ``finished_at`` : finished at


<br><hr><br>

## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // created answerSheet data
}
```