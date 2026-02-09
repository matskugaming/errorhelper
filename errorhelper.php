<?php declare(strict_types=1);function xml_error(int $statusCode, string $message, array $extra = []): never{http_response_code($statusCode);header('Content-Type: application/xml; charset=utf-8');echo '<?xml version="1.0" encoding="UTF-8"?>';echo '<error>';echo '<code>' . $statusCode . '</code>';echo '<message>' . htmlspecialchars($message, ENT_XML1) . '</message>';if (!empty($extra)) {echo '<details>';foreach ($extra as $key => $value) {echo '<' . preg_replace('/[^a-z0-9_\-]/i', '', $key) . '>';echo htmlspecialchars((string)$value, ENT_XML1);echo '</' . preg_replace('/[^a-z0-9_\-]/i', '', $key) . '>';}echo '</details>';}echo '</error>';exit;}function json_error(int $statusCode, string $message, array $extra = []): never{http_response_code($statusCode);header('Content-Type: application/json; charset=utf-8');echo json_encode($a = ["success" => "false", "errors" => ["code" => $statusCode,"message" => $message,"details" => $extra,]], JSON_PRETTY_PRINT);exit;}
/**
 * XML/JSON Error response helper
 *
 * Usage:
 *   require_once __DIR__ . '/error.php';
 *   xml_error(404, 'Not found', ["path" => null]);
 *   json_error(404, 'Not found', ["path" => null]);
 */
