sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant RentUnitTypeController as RentUnitTypeController
    participant Model as Model
    participant DB as Database
    
    C->>R: Request
    R->>+RentUnitTypeController: rent()
    Note over RentUnitTypeController: Process request
    alt Uses database
      RentUnitTypeController->>+Model: operation()
      Model->>+DB: Database query
      DB-->>-Model: Return data
      Model-->>-RentUnitTypeController: Return result
    else Direct response
      Note over RentUnitTypeController: Process without database
    end
    RentUnitTypeController-->>-R: Return response
    R-->>C: Response
    
    Note over RentUnitTypeController: Generic operation flow
  