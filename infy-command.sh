#admin rollback
#php artisan infyom:rollback ProftfolioCategory scaffold
#php artisan infyom:rollback Testimonial scaffold
#php artisan infyom:rollback TeamType scaffold
#php artisan infyom:rollback TeamMember scaffold
#php artisan infyom:rollback Slider scaffold
#php artisan infyom:rollback ProtfolioItem scaffold
php artisan infyom:rollback ProtfolioFaq scaffold

#admin adding
#php artisan infyom:scaffold ProftfolioCategory --fieldsFile='./public/fields_sample/protfolio_category.json'
#php artisan infyom:scaffold Testimonial --fieldsFile='./public/fields_sample/testimonial.json'
#php artisan infyom:scaffold TeamType --fieldsFile='./public/fields_sample/team_type.json'
#php artisan infyom:scaffold TeamMember --fieldsFile='./public/fields_sample/team_member.json'
#php artisan infyom:scaffold Slider --fieldsFile='./public/fields_sample/sliders.json'
#php artisan infyom:scaffold ProtfolioItem --fieldsFile='./public/fields_sample/protfolio.json'
php artisan infyom:scaffold ProtfolioFaq --fieldsFile='./public/fields_sample/protfolio_faq.json'