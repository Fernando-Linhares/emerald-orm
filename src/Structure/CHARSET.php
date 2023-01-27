<?php

namespace Emerald\Orm\Structure;

enum CHARSET
{
    case UTF8;

    case ISO_8859_1;

    case NATS_SEFI;

    case ISO_2022_KR;

    case ISO_5427;
}