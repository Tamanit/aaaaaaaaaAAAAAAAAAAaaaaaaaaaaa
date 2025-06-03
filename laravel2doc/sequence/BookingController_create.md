sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant BookingController as BookingController
    participant V as Validator
    participant Model as Model
    participant DB as Database
    
    C->>R: POST /resource
    R->>+BookingController: create(request)
    BookingController->>+V: validate(request)
    V-->>-BookingController: validated data
    BookingController->>+Model: create(data)
    Model->>+DB: INSERT INTO table
    DB-->>-Model: Return new record
    Model-->>-BookingController: New model instance
    BookingController-->>-R: Return JSON response
    R-->>C: 201 Created with data
    
    Note over BookingController,Model: This sequence creates a new resource
  