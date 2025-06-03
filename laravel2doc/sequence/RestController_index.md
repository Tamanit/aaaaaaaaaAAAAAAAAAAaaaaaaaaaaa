sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant RestController as RestController
    participant Model as Model
    participant DB as Database
    
    C->>R: GET /resource
    R->>+RestController: index()
    RestController->>+Model: all() / get() / paginate()
    Model->>+DB: SELECT * FROM table
    DB-->>-Model: Return records
    Model-->>-RestController: Collection of models
    RestController-->>-R: Return JSON response
    R-->>C: 200 OK with data
    
    Note over RestController,Model: This sequence retrieves a list of resources
  