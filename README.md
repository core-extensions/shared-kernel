# Shared Kernel

Common classes and interfaces for supporting DDD, CQRS, EventSourcing. 

## Questions

* Why do you use apply* methods instead of direct changing model?

EventSourcing friendly approach. You can change model directly and emit only required events if you're sure you won't 
EventSourcing.

## Cases

* notify users after saving? (publishing message bus after saving)
