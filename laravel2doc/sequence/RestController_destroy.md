sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant RestController as RestController
    participant Model as Model
    participant DB as Database
    
    C->>R: DELETE /resource/{id}
    R->>+RestController: destroy(id)
    RestController->>+Model: find(id)
    Model->>+DB: SELECT * FROM table WHERE id = ?
    DB-->>-Model: Return record
    Model-->>-RestController: Model instance
    RestController->>+Model: delete()
    Model->>+DB: DELETE FROM table WHERE id = ?
    DB-->>-Model: Success
    Model-->>-RestController: Success
    RestController-->>-R: Return JSON response
    R-->>C: 204 No Content
    
    Note over RestController,Model: This sequence removes a resource
  