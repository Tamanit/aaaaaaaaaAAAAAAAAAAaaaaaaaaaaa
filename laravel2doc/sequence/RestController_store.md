sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant RestController as RestController
    participant V as Validator
    participant Model as Model
    participant DB as Database
    
    C->>R: POST /resource
    R->>+RestController: store(request)
    RestController->>+V: validate(request)
    V-->>-RestController: validated data
    RestController->>+Model: create(data)
    Model->>+DB: INSERT INTO table
    DB-->>-Model: Return new record
    Model-->>-RestController: New model instance
    RestController-->>-R: Return JSON response
    R-->>C: 201 Created with data
    
    Note over RestController,Model: This sequence creates a new resource
  