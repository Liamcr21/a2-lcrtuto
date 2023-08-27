<?php 

namespace App\Twig;

use Symfony\Component\Security\Core\Security;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('isUserAdmin', [$this, 'isUserAdmin']),
            new TwigFunction('isUserAuthor', [$this, 'isUserAuthor']),
        ];
    }

    public function isUserAdmin()
    {
        return $this->security->isGranted('ROLE_ADMIN');
    }

    public function isUserAuthor()
    {
        return $this->security->isGranted('ROLE_AUTHOR');
    }
}
