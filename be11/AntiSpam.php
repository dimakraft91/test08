<?php

namespace BE11\AntiSpam;

class AntiSpam
{
    private \SQLite3 $db;

    public function __construct()
    {
        $this->db = new \SQLite3(__DIR__ . '/orders.db');
        $this->initTable();
    }

    private function initTable(): void
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS orders (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            ip TEXT NOT NULL,
            name TEXT,
            phone TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
    }

    private function ensureColumns(array $fields): void
    {
      $result = $this->db->query("PRAGMA table_info(orders)");
      $existing = [];

      while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $existing[] = $row['name'];
      }

      foreach ($fields as $field) {
        if (!in_array($field, $existing)) {
          $this->db->exec("ALTER TABLE orders ADD COLUMN $field TEXT");
        }
      }
    }

    public function isDuplicate(string $ip): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM orders WHERE ip = :ip");
        $stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
        $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
        return $result['count'] > 0;
    }

    public function addSubmission(string $ip, string $name = null, string $phone = null, array $utm = []): void
    {
        $this->ensureColumns(array_keys($utm));

        $columns = ['ip', 'name', 'phone'];
        $placeholders = [':ip', ':name', ':phone'];

        foreach ($utm as $key => $_) {
            $columns[] = $key;
            $placeholders[] = ':' . $key;
        }

        $sql = "INSERT INTO orders (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':phone', $phone, SQLITE3_TEXT);
        foreach ($utm as $key => $value) {
            if (in_array($key, ['ip', 'name', 'phone'])) continue;
            $stmt->bindValue(":".$key, $value ?? null, SQLITE3_TEXT);
        }
        $stmt->execute();
    }
}