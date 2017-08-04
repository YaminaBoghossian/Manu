<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Messages
 *
 * @author arethens
 */
class Messages implements JsonSerializable {
    protected $id;
    protected $text;
    protected $timestamp;
    
    function __construct($text, $timestamp, int $id = null) {
        $this->id = $id;
        $this->text = $text;
        $this->timestamp = $timestamp;
    }

    function getId() {
        return $this->id;
    }

    function getText() {
        return $this->text;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

public function jsonSerialize() {
    return [
        "text" => $this->getText(),
        "timestamp" => $this->getTimestamp(),
        "id" => $this->getId()
    ];
}
    
    
}
