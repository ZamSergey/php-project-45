install:
		composer install
lint:
		composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-games:
		./bin/brain-games

brain-even:
		./bin/brain-even

brain-calc:
		./bin/brain-calc

brain-gcd:
		./bin/brain-gcd

brain-prime:
		./bin/brain-prime
				
brain-progression:
		./bin/brain-progression		

validate: 
		composer validate



