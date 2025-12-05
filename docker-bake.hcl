group "default" {
  targets = ["php", "nginx"]
}

target "php" {
  target = "php-prod"
  tags = ["secultceara/slidetv-php:1.0"]
}

target "nginx" {
  target = "nginx-prod"
  tags = ["secultceara/slidetv-nginx:1.0"]
}
