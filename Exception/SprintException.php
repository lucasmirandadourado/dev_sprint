<?php 

    class SprintException extends Exception {

        function __construct($mensagem, $code = 0, $previous = null) {
            parent::__construct($mensagem, $code, $previous);
        }

        public function __toString() {
            return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        }
    }
?>