sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant AuthController as AuthController
    participant V as Validator
    participant Model as Model
    participant DB as Database
    
    C->>R: POST /resource
    R->>+AuthController: store(request)
    AuthController->>+V: validate(request)
    V-->>-AuthController: validated data
    AuthController->>+Model: create(data)
    Model->>+DB: INSERT INTO table
    DB-->>-Model: Return new record
    Model-->>-AuthController: New model instance
    AuthController-->>-R: Return JSON response
    R-->>C: 201 Created with data
    
    Note over AuthController,Model: This sequence creates a new resource
  