sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant AuthController as AuthController
    participant Model as Model
    participant DB as Database
    
    C->>R: DELETE /resource/{id}
    R->>+AuthController: destroy(id)
    AuthController->>+Model: find(id)
    Model->>+DB: SELECT * FROM table WHERE id = ?
    DB-->>-Model: Return record
    Model-->>-AuthController: Model instance
    AuthController->>+Model: delete()
    Model->>+DB: DELETE FROM table WHERE id = ?
    DB-->>-Model: Success
    Model-->>-AuthController: Success
    AuthController-->>-R: Return JSON response
    R-->>C: 204 No Content
    
    Note over AuthController,Model: This sequence removes a resource
  