# Primo Sito

Benvenuto nel repository **Primo Sito**, il codice sorgente del sito disponibile su [masone.cloud/primo-sito](https://masone.cloud/primo-sito/).

## Descrizione

Questo progetto rappresenta il mio primo sito web, un esempio pratico di sviluppo web con funzionalità lato server e un database MySQL.

Il sito è ospitato su [masone.cloud](https://masone.cloud/) e può essere visitato direttamente [qui](https://masone.cloud/primo-sito/).

## Funzionalità

- **Design Responsivo**: Layout ottimizzato per dispositivi desktop e mobili.
- **Connessione al Database**: Il sito interagisce con un database MySQL per gestire i dati.
- **Struttura Semplice**: Ideale per apprendere i concetti base dello sviluppo web full-stack.

### Dettagli del Database

- Nome del database: `primo-sito`
- File SQL: `primo-sito.sql`

Per configurare il database:

1. Importa il file `primo-sito.sql` nel tuo server MySQL:
   ```bash
   mysql -u root -p primo-sito < primo-sito.sql
   ```
   Oppure usa un'interfaccia grafica come phpMyAdmin.

2. Configura i parametri di connessione nel file `connect.php` se necessario:
   ```php
   <?php
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db_name = 'primo-sito';

   $conn = new MySQLi($host, $user, $pass, $db_name);

   if ($conn->connect_error) {
       die('Database connection error: ' . $conn->connect_error);
   }
   ?>
   ```

## Tecnologie Utilizzate

- **HTML5**: Per la struttura del sito.
- **CSS3**: Per lo stile e il design responsivo.
- **JavaScript**: Per funzionalità dinamiche e interattive (opzionale).
- **PHP**: Per la connessione e l'interazione con il database.
- **MySQL**: Per la gestione dei dati.

## Come Utilizzare

1. **Clonare il Repository**:
   ```bash
   git clone https://github.com/masonedotcloud/primo-sito.git
   cd primo-sito
   ```

2. **Configurare il Database**:
   - Importa il file `primo-sito.sql`.
   - Verifica che i dettagli del file `connect.php` siano corretti per il tuo ambiente.

3. **Eseguire il Sito**:
   - Sposta i file nel tuo server web locale (es. XAMPP, MAMP).
   - Accedi al sito tramite il browser.

## Link al Sito

Puoi visualizzare il sito online qui: [https://masone.cloud/primo-sito/](https://masone.cloud/primo-sito/)

## Licenza

Questo progetto è distribuito sotto la Licenza MIT - vedi il file [LICENSE](LICENSE) per ulteriori dettagli.


## Autore

Questo progetto è stato creato da [alessandromasone](https://github.com/alessandromasone).