# Teste de Programação - CakePHP (Back-end)
### Para executar
```
bin/cake server
```
Acesse a porta http://localhost:8765 para visualizar a aplicação
### Tabela ```todo``` da base de dados ```todolist``` usada no projeto
```sql
CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `finished` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
```
Acesse config/app_local.php e configure seu banco de dados em 'Datasources'
