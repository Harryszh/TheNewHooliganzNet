ich mochte die login seite gestalten

Auftrag                         :           An dich liebe Chatii Gniiti

Erstellen wir was zusammen      :         Bitte                                         

Ziel:
Entwicklung einer modernen, performanten und modular aufgebauten Webanwendung mit Vue 
3, die höchsten Qualitätsansprüchen genügt.

Anforderungen:

Verwendung von Vue 3 Composition API
Saubere Komponentenstruktur und Wiederverwendbarkeit
State-Management mit Pinia
Integration eines Vue-Routers (inkl. Protected Routes)

Backend Laravel 11 mit mysql
Technische Qualität und ein provesioneles hightend 

Sauberer, gut dokumentierter Code
Performance-Optimierung (Lazy Loading, Code Splitting)
Klare Trennung von Logik und Darstellung
Einhaltung aktueller Best Practices

Zielgruppe:
Die App wird nach Vollendung auf den Markt kommen. Die Grundlage (Komponenten) soll wiederverwendet werden für ein professionelles Produkt im Web – das die Menschen zwichen ca. 33 bis 60 begeistern werden soll.“

  schon vorhanden sind 

🔗 Relevante Verbindungen & Pfade
🐘 Datenbank (MySQL)
    Service-Name: HooliNetdb
    Pfad im Container: /var/lib/mysql
    Lokaler Mount: ./(via Volume: dbdataz)

    ⚙️ Backend (Laravel)
Service-Name: backend
Container-Name: net2_backend
Pfad im Container: /var/www/html
Lokaler Mount: ./backend:/var/www/html

🌐 Frontend (Vue 3)
Service-Name: frontend
Container-Name: net2_frontend
Pfad im Container: /app
Lokaler Mount: ./frontend:/app
Node Modules Volume: frontend_node_modules:/app/node_modules

🛠️ phpMyAdmin
Service-Name: phpmyadmin
Pfad im Container: /var/www/html (Standard bei phpmyadmin)
Kein lokaler Volume-Mount notwendig



🔧 Erstkonfiguration (Docker-basiert)
Führe im laufenden Container net2_frontend dieses Skript aus, um die Grundstruktur zu erzeugen:
