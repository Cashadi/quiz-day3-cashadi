<?php

class SignInReader {
    private string $email;
    private string $password;
    private string $name;
    private int $age;

    public function __construct(string $email, string $password, string $name, int $age) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->age = $age;
    }

    // setter
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setName(string $name): void {
        $this->$name = $name;
    }

    public function setAge(int $age): void {
        $this->age = $age;
    }

    // getter
    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAge(): int {
        return $this->age;
    }
}