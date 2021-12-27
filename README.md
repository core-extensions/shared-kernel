# Shared Kernel

> Common classes and interfaces

## Questions

* Для чего нужны apply* и events? Почему просто не вызывать методы AR?

Можно вызывать методы напрямую. Но использование AggregateChanged (extends DomainEvent) удобно в плане typed аргументов
вызова, готово для реализации event-sourcing, готово для реализации push событий.

## Cases

* notify users after saving? (publishing message bus after saving)
