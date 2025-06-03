sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant RestController as RestController
    participant Model as Model
    participant DB as Database
    
    C->>R: GET /resource/{id}
    R->>+RestController: show(id)
    RestController->>+Model: find(id) / findOrFail(id)
    Model->>+DB: SELECT * FROM table WHERE id = ?
    DB-->>-Model: Return record
    Model-->>-RestController: Model instance
    RestController-->>-R: Return JSON response
    R-->>C: 200 OK with data
    
    Note over RestController,Model: This sequence retrieves a specific resource by ID
  