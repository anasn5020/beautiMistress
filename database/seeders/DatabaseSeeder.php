<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@velvetluxe.com',
            'password' => bcrypt('password'),
            'phone' => '+1 (555) 000-0000',
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'phone' => '+1 (555) 111-1111',
            'is_admin' => false,
        ]);

        Service::create(['name' => 'Luxe Haircut & Styling', 'description' => 'A precision haircut tailored to your face shape followed by a professional blow-dry and styling.', 'category' => 'Hair', 'duration' => 60, 'price' => 85, 'is_active' => true]);
        Service::create(['name' => 'Professional Hair Coloring', 'description' => 'Full-color application using premium ammonia-free dyes for vibrant, long-lasting results.', 'category' => 'Hair', 'duration' => 120, 'price' => 150, 'is_active' => true]);
        Service::create(['name' => 'Balayage & Highlights', 'description' => 'Hand-painted highlights for a natural, sun-kissed look that grows out beautifully.', 'category' => 'Hair', 'duration' => 150, 'price' => 200, 'is_active' => true]);
        Service::create(['name' => 'Keratin Smoothing Treatment', 'description' => 'Transform frizzy, unmanageable hair into silky, smooth locks with our keratin infusion treatment.', 'category' => 'Hair', 'duration' => 90, 'price' => 180, 'is_active' => true]);
        Service::create(['name' => 'Signature Facial', 'description' => 'A deeply relaxing facial with custom extractions, mask, and hydrating massage tailored to your skin type.', 'category' => 'Skin', 'duration' => 60, 'price' => 95, 'is_active' => true]);
        Service::create(['name' => 'Anti-Aging Treatment', 'description' => 'Target fine lines and wrinkles with collagen-boosting serums and advanced lifting techniques.', 'category' => 'Skin', 'duration' => 75, 'price' => 130, 'is_active' => true]);
        Service::create(['name' => 'HydraFacial Deluxe', 'description' => 'The ultimate resurfacing facial that cleanses, extracts, and hydrates using vortex technology.', 'category' => 'Skin', 'duration' => 60, 'price' => 120, 'is_active' => true]);
        Service::create(['name' => 'Bridal Makeup Package', 'description' => 'A comprehensive bridal look including trial session, airbrush foundation, and waterproof application.', 'category' => 'Makeup', 'duration' => 120, 'price' => 250, 'is_active' => true]);
        Service::create(['name' => 'Evening Glam Makeup', 'description' => 'Full-face glam makeup perfect for special occasions, featuring bold eyes and flawless complexion.', 'category' => 'Makeup', 'duration' => 60, 'price' => 120, 'is_active' => true]);
        Service::create(['name' => 'Luxury Manicure & Pedicure', 'description' => 'Pamper your hands and feet with soak, scrub, massage, and a flawless polish application.', 'category' => 'Nails', 'duration' => 90, 'price' => 80, 'is_active' => true]);
        Service::create(['name' => 'Gel Nail Art', 'description' => 'Long-lasting gel polish with custom hand-painted nail art designs by our expert nail artists.', 'category' => 'Nails', 'duration' => 60, 'price' => 65, 'is_active' => true]);
        Service::create(['name' => 'Aromatherapy Massage', 'description' => 'A soothing full-body massage using essential oil blends tailored to your mood and needs.', 'category' => 'Spa', 'duration' => 60, 'price' => 110, 'is_active' => true]);
        Service::create(['name' => 'Hot Stone Therapy', 'description' => 'Heated basalt stones placed on key energy points to melt tension and improve circulation.', 'category' => 'Spa', 'duration' => 75, 'price' => 140, 'is_active' => true]);
        Service::create(['name' => 'Full Body Waxing', 'description' => 'Complete body waxing service using premium hard and soft waxes for smooth, hair-free skin.', 'category' => 'Waxing', 'duration' => 60, 'price' => 75, 'is_active' => true]);

        Staff::create(['name' => 'Isabella Rossi', 'email' => 'isabella@velvetluxe.com', 'phone' => '+1 (555) 200-0001', 'role' => 'Master Stylist', 'bio' => 'With over 12 years of experience, Isabella specializes in precision cutting and custom coloring. She is a certified L\'Oréal colorist who keeps up with the latest trends.', 'image' => 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?w=400&q=85', 'is_active' => true]);
        Staff::create(['name' => 'Sophia Chen', 'email' => 'sophia@velvetluxe.com', 'phone' => '+1 (555) 200-0002', 'role' => 'Skincare Specialist', 'bio' => 'Sophia is a licensed esthetician with expertise in advanced facial treatments and chemical peels. Her gentle touch and customized approach leave every client glowing.', 'image' => 'https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?w=400&q=85', 'is_active' => true]);
        Staff::create(['name' => 'Olivia Martinez', 'email' => 'olivia@velvetluxe.com', 'phone' => '+1 (555) 200-0003', 'role' => 'Makeup Artist', 'bio' => 'Olivia has worked backstage at New York Fashion Week and specializes in bridal and editorial makeup. She uses only premium cruelty-free products.', 'image' => 'https://images.unsplash.com/photo-1526510747491-58f928ec870f?w=400&q=85', 'is_active' => true]);
        Staff::create(['name' => 'Amara Johnson', 'email' => 'amara@velvetluxe.com', 'phone' => '+1 (555) 200-0004', 'role' => 'Nail Art Specialist', 'bio' => 'Amara is an award-winning nail artist known for her intricate gel art and impeccable manicure techniques. She brings creativity and precision to every set.', 'image' => 'https://images.unsplash.com/photo-1521593654090-1b4054fe1c0f?w=400&q=85', 'is_active' => true]);
        Staff::create(['name' => 'Elena Petrova', 'email' => 'elena@velvetluxe.com', 'phone' => '+1 (555) 200-0005', 'role' => 'Spa Therapist', 'bio' => 'Elena trained in traditional Swedish and Balinese massage techniques. Her intuitive healing touch provides deep relaxation and relief from chronic tension.', 'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&q=85', 'is_active' => true]);
        Staff::create(['name' => 'Mia Williams', 'email' => 'mia@velvetluxe.com', 'phone' => '+1 (555) 200-0006', 'role' => 'Waxing Specialist', 'bio' => 'Mia is a skilled esthetician specializing in gentle waxing and body treatments. She ensures a comfortable experience with her fast, precise technique.', 'image' => 'https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=400&q=85', 'is_active' => true]);

        Testimonial::create(['client_name' => 'Sarah Mitchell', 'client_email' => 'sarah@example.com', 'rating' => 5, 'content' => 'I had the HydraFacial Deluxe with Sophia and my skin has never looked better. The studio is immaculate and the staff is incredibly welcoming. I have already booked my next appointment!', 'is_approved' => true]);
        Testimonial::create(['client_name' => 'Emily Rodriguez', 'client_email' => 'emily@example.com', 'rating' => 5, 'content' => 'Olivia did my bridal makeup and I felt absolutely stunning on my wedding day. She listened to exactly what I wanted and the airbrush application lasted all night.', 'is_approved' => true]);
        Testimonial::create(['client_name' => 'Jessica Park', 'client_email' => 'jessica@example.com', 'rating' => 4, 'content' => 'Isabella gave me the best haircut I have ever had. The balayage came out exactly as I envisioned. The only downside is that parking can be a bit tricky during peak hours.', 'is_approved' => true]);
        Testimonial::create(['client_name' => 'Amanda Foster', 'client_email' => 'amanda@example.com', 'rating' => 5, 'content' => 'The Hot Stone Therapy with Elena was pure bliss. I walked in stressed and walked out feeling like a new person. The tranquil atmosphere completes the experience.', 'is_approved' => true]);
        Testimonial::create(['client_name' => 'Rachel Kim', 'client_email' => 'rachel@example.com', 'rating' => 5, 'content' => 'Amara did a gel nail art set with floral designs and they lasted over three weeks without chipping. She is truly an artist. I recommend her to everyone!', 'is_approved' => true]);
        Testimonial::create(['client_name' => 'Lauren Thompson', 'client_email' => 'lauren@example.com', 'rating' => 3, 'content' => 'The service was good overall but I had to wait a bit past my appointment time. The staff was very apologetic and the quality of work was still excellent.', 'is_approved' => false]);

        Package::create([
            'name' => 'Basic Glow',
            'description' => 'Perfect for a quick self-care treat. Choose any single service and enjoy exclusive perks.',
            'tier' => 'basic',
            'price' => 149,
            'features' => [
                '1 service of choice',
                'Basic consultation',
                '10% off products',
            ],
            'is_active' => true,
        ]);

        Package::create([
            'name' => 'Premium Radiance',
            'description' => 'Our most popular package for those who want a full pampering session with added VIP treatment.',
            'tier' => 'premium',
            'price' => 299,
            'features' => [
                '2 services of choice',
                'Priority booking',
                '15% off products',
                'Complimentary welcome drink',
            ],
            'is_active' => true,
        ]);

        Package::create([
            'name' => 'VIP Luxe',
            'description' => 'The ultimate luxury experience for our most discerning clients. Indulge in a full day of beauty and relaxation.',
            'tier' => 'vip',
            'price' => 499,
            'features' => [
                '4 services of choice',
                'VIP express booking',
                '20% off products',
                'Complimentary champagne',
                'Take-home skincare kit',
                'Exclusive member events',
            ],
            'is_active' => true,
        ]);

        Gallery::create(['title' => 'Elegant Reception', 'category' => 'Interior', 'image' => 'https://images.unsplash.com/photo-1633681926033-ef8ebec2e0df?w=600&q=85', 'sort_order' => 1, 'is_active' => true]);
        Gallery::create(['title' => 'Treatment Room', 'category' => 'Interior', 'image' => 'https://images.unsplash.com/photo-1560066984-138dadb4c035?w=600&q=85', 'sort_order' => 2, 'is_active' => true]);
        Gallery::create(['title' => 'Spa Area', 'category' => 'Interior', 'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=600&q=85', 'sort_order' => 3, 'is_active' => true]);
        Gallery::create(['title' => 'Relaxation Lounge', 'category' => 'Interior', 'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?w=600&q=85', 'sort_order' => 4, 'is_active' => true]);
        Gallery::create(['title' => 'Styling Station', 'category' => 'Interior', 'image' => 'https://images.unsplash.com/photo-1521593654090-1b4054fe1c0f?w=600&q=85', 'sort_order' => 5, 'is_active' => true]);
        Gallery::create(['title' => 'Product Display', 'category' => 'Interior', 'image' => 'https://images.unsplash.com/photo-1559599101-f09722fb4948?w=600&q=85', 'sort_order' => 6, 'is_active' => true]);
        Gallery::create(['title' => 'Bridal Makeup', 'category' => 'Events', 'image' => 'https://images.unsplash.com/photo-1487412912498-0447578fcca8?w=600&q=85', 'sort_order' => 7, 'is_active' => true]);
        Gallery::create(['title' => 'Fashion Show', 'category' => 'Events', 'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=600&q=85', 'sort_order' => 8, 'is_active' => true]);
        Gallery::create(['title' => 'Beauty Workshop', 'category' => 'Events', 'image' => 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?w=600&q=85', 'sort_order' => 9, 'is_active' => true]);
        Gallery::create(['title' => 'Facial Transformation', 'category' => 'BeforeAfter', 'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=600&q=85', 'sort_order' => 10, 'is_active' => true]);
        Gallery::create(['title' => 'Nail Art', 'category' => 'BeforeAfter', 'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?w=600&q=85', 'sort_order' => 11, 'is_active' => true]);
        Gallery::create(['title' => 'Hair Makeover', 'category' => 'BeforeAfter', 'image' => 'https://images.unsplash.com/photo-1560750588-73207b1ef5b8?w=600&q=85', 'sort_order' => 12, 'is_active' => true]);

        Contact::create(['name' => 'Sarah Mitchell', 'email' => 'sarah@example.com', 'subject' => 'Wedding Package Inquiry', 'message' => 'Hello, I am getting married in August and would love to book a bridal trial with Olivia. Could you please let me know your availability for Saturdays? Thank you!', 'is_read' => false]);
        Contact::create(['name' => 'Michael Brown', 'email' => 'michael@example.com', 'subject' => 'Gift Certificate', 'message' => 'I would like to purchase a gift certificate for my wife. Can you tell me what denominations are available and how I can order one?', 'is_read' => true]);
        Contact::create(['name' => 'Jessica Park', 'email' => 'jessica@example.com', 'subject' => 'Product Recommendation', 'message' => 'I visited last week for a facial and absolutely loved the serum you used. Can you tell me the brand so I can purchase it?', 'is_read' => false]);
    }
}
