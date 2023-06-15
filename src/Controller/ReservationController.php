<?php

namespace App\Controller;

use App\Form\ReservationFormType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(TransportInterface $mailer, Request $request): Response
    {
        $form = $this->createForm(ReservationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $emailAddress = $data['email'];
            $firstName = $data['firstname'];
            $lastName = $data['lastname'];
            $participants = $data['participants'];
            $time = $data['time'];
            $event = $data['evenement'];
            $message = $data['message'];

            $email = (new Email())
                ->from($emailAddress)
                ->to('admin@exemple.com')
                ->subject('Demande de Réservation')
                ->text(sprintf(
                    "Prénom : %s\nNom : %s\nEmail : %s\nParticipants : %d\nDate et heure : %s\nÉvènement : %s\nMessage : %s",
                    $firstName,
                    $lastName,
                    $emailAddress,
                    $participants,
                    $time->format('Y-m-d H:i:s'),
                    $event,
                    $message
                ));
            $mailer->send($email);
            
            $this->addFlash('success','Merci pour votre réservation, notre équipe vous répondrons dans un délai de 24h.');
            // ->text(sprintf(empty($data['message']) ? '' : $data['message']));   
            return $this->redirectToRoute('app_reservation');
        }

        return $this->render('reservation/index.html.twig', [
            'formReserve' => $form->createView(),
        ]);
    }
}
