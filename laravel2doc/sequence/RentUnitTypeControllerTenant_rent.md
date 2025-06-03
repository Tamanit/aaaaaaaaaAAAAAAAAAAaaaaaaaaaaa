sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant RentUnitTypeControllerTenant as RentUnitTypeControllerTenant
    participant Model as Model
    participant DB as Database
    
    C->>R: Request
    R->>+RentUnitTypeControllerTenant: rent()
    Note over RentUnitTypeControllerTenant: Process request
    alt Uses database
      RentUnitTypeControllerTenant->>+Model: operation()
      Model->>+DB: Database query
      DB-->>-Model: Return data
      Model-->>-RentUnitTypeControllerTenant: Return result
    else Direct response
      Note over RentUnitTypeControllerTenant: Process without database
    end
    RentUnitTypeControllerTenant-->>-R: Return response
    R-->>C: Response
    
    Note over RentUnitTypeControllerTenant: Generic operation flow
  