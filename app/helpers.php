<?php

function getCardClass($tipo)
{
    switch ($tipo) {
        case 'Água':
            return 'card-agua';
        case 'Fogo':
            return 'card-fogo';
        case 'Grama':
            return 'card-grama';
        case 'Elétrico':
            return 'card-eletrico';
        case 'Pedra':
            return 'card-pedra';
        case 'Vooador':
            return 'card-voador';
        case 'Psíquico':
            return 'card-psiquico';
        case 'Venenoso':
            return 'card-venenoso';  
        case 'Fada':
            return 'card-fada';  
        default:
            return '';
    }
}
